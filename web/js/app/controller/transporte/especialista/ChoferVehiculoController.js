
Ext.define('CDT.controller.transporte.especialista.ChoferVehiculoController', {
    extend: 'Ext.app.Controller',

    control:{
            'chofervehiculoGrid': {
                resize: function (grid) { grid.setHeight(Ext.ex.height('south-panel-id', 50)); },
                afterrender: function (grid, eOpts) { var me = this; me.grid = grid; me.store = grid.store; }
            },
            'chofervehiculoGrid button[iconCls=fa fa-plus]': {
                click: "showChoferVehiculo"
            },
            'chofervehiculoGrid button[iconCls=fa fa-times]': {
                click: "confirmRemuve"
            },
            'chofervehiculoGrid button[iconCls=fa fa-pencil]': {
                click: "confirmEdit"
            },
            // Formulario
            'chofervehiculoForm': {
                afterrender: "afterRenderWin"
            },
            'chofervehiculoForm combobox[emptyText=Área del Chofer]': {
                select: "filterChofer"
            },
            'chofervehiculoForm combobox[emptyText=Área del Vehículo]': {
                select: "filterVehiculo"
            },
            'chofervehiculoForm button[iconCls=fa fa-trash]': {
                click: "cleanComboAreaChofer"
            },
            'chofervehiculoForm button[iconCls=fa fa-trash-o]': {
                click: "cleanComboAreaVehiculo"
            },
            'chofervehiculoForm button[action=save]': {
                click: "validateForm"
            },
            'chofervehiculoForm combobox[name=chofer]': {
                select: function (cmb) { var me = this; me.choferId = cmb.value; }
            },
            'chofervehiculoForm combobox[name=vehiculo]': {
                select: function (cmb) { var me = this; me.vehiculoId = cmb.value; }
            },
            'chofervehiculoForm button[iconCls=fa fa-pencil]': {
                click: "validateForm"
            }
    },
    loadStore: function () { var me = this; me.store.load(); },
    // Mostrar Windows Chofer-Vehiculo.
    showChoferVehiculo: function(action)
    {   
        var me = this;
        if (action !== 'edit')
        {
            var config = { btnText: 'Salvar', btnIconCls: 'fa fa-check-circle-o', btnAction: 'save' },
                // Crear Window.
                win = Ext.create('CDT.view.transporte.especialista.chofer_vehiculo.ChoferVehiculoForm', config);
        }
        else
        {   // Obtener registro seleccionado del grid.
            var record = me.grid.selModel.getSelection()[0],
                // Crear ventana y configurarla para editar.
                config = { title: 'Editar chofer-vehículo', btnText: 'Editar', btnIconCls: 'fa fa-pencil', btnAction: 'edit', chofervehiculoId: record.get('id')},
                // Crear Window.
                win = Ext.create('CDT.view.transporte.especialista.chofer_vehiculo.ChoferVehiculoForm', config),
                // Obtener formulario contenido en la ventana.
                form = win.down('form');
                // ID chofer.
                me.choferId = record.get('chofer_id');
                // ID vehiculo.
                me.vehiculoId = record.get('vehiculo_id');
            // Cargar formulario con los datos del registro seleccionado del grid.
            form.loadRecord(record);
        }
        // Mostrar ventana.
        win.show();
    },
    // Cuando la ventana del formulario es renderiada.
    afterRenderWin: function (win, eOpts)
    {
        var me = this;
        me.win = win;
        me.form = win.down('form');
        //
        me.storeChofer = win.choferStore;
        me.storeChofer.proxy.url = entorno+'/transporte/chofer/list';
        me.storeChofer.load();
        //
        me.storeVehiculo = win.vehiculoStore;
        me.storeVehiculo.proxy.url = entorno+'/transporte/vehiculo/list';
        me.storeVehiculo.load();

    },
    // Filtrar combobox chofer.
    filterChofer: function (cmb)
    {
        var me = this;
        me.storeChofer.clearFilter();
        if (cmb.value)
        {
            me.storeChofer.filter({
                property: 'area',
                value: cmb.value,
                anyMatch: true,
                caseSensitive: true
            });
        };
        me.win.down('[name=chofer]').setValue();
        me.win.down('[iconCls=fa fa-trash]').setDisabled(false);
    },
    // Filtrar combobox vehiculo.
    filterVehiculo: function (cmb)
    {
        var me = this;
        me.storeVehiculo.clearFilter();
        if (cmb.value)
        {
            me.storeVehiculo.filter({
                property: 'area',
                value: cmb.value,
                anyMatch: true,
                caseSensitive: true
            });
        };
        me.win.down('[name=vehiculo]').setValue();
        me.win.down('[iconCls=fa fa-trash-o]').setDisabled(false);
    },
    // Limpiar combobox Area y quitar filtro a Combo Chofer.
    cleanComboAreaChofer: function ()
    {
        var me = this;
        me.win.down('[id=chofer-fieldset-area]').collapse();
        me.win.down('[iconCls=fa fa-trash]').setDisabled(true);
        me.win.down('[emptyText=Área del Chofer]').setValue();
        me.win.down('[name=chofer]').setValue();
        me.storeChofer.clearFilter();
    },
    // Limpiar combobox Area y quitar filtro a Combo Vehiculo.
    cleanComboAreaVehiculo: function ()
    {
        var me = this;
        me.win.down('[id=vehiculo-fieldset-area]').collapse();
        me.win.down('[iconCls=fa fa-trash-o]').setDisabled(true);
        me.win.down('[emptyText=Área del Vehículo]').setValue();
        me.win.down('[name=vehiculo]').setValue();
        me.storeVehiculo.clearFilter();
    },
    // Limpiar los componentes unicos del formulario.
    cleanComponentesUnicosForm: function ()
    {
        var me = this, chofer = me.form.down('[name=chofer]');

        chofer.setValue();
        chofer.markInvalid('Verifique que el chofer no esté asignado');
    },
/*----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    // Validar formulario.
    validateForm: function ()
    {
        var me = this;
        if (me.form.getForm().isValid())
        {
            if (me.win.title === 'Adicionar chofer-vehículo')
            {
                me.addChoferVehiculo(me.form.getForm().getValues(), me.form.getForm());
            }
            else {
                me.editChoferVehiculo(me.form.getForm().getValues());
            }
        } else {
            Ext.ex.MessageBox('Atención', '<b><span style="color:red;">Formulario no válido</span></b>, verifique las casillas en <b><span style="color:red;">rojo</span></b>.', 'info');
        }
    },
    // Insertar datos de chofer-vehículo.
    addChoferVehiculo: function (record, form)
    {
        var me = this;
        Ext.Ajax.request({
            url: entorno+'/transporte/chofer_vehiculo/add',
            params: {
                Permanente : record['permanente'],
                ChoferId   : me.choferId,
                VehiculoId : me.vehiculoId
            },
            success: function (response) {
                switch (response.responseText) {
                    case '':
                        me.loadStore();
                        Ext.ex.msg('Creación OK', 'Operación realizada exitosamente.');
                        form.reset();
                        break;
                    case 'Unico':
                        Ext.ex.MessageBox('Atención', '<b><span style="color:red;">Ya está asignado ese chofer</span></b>, verifique la casilla en <b><span style="color:red;">rojo</span></b>.', 'question');
                        me.cleanComponentesUnicosForm();
                        break;
                    default:
                        Ext.ex.MessageBox('Error', response.responseText, 'error');
                        break;
                }
            },
            failure: function () {
                Ext.ex.MessageBox('Error','No se pudo conectar con el servidor, inténtelo más tarde.', 'error');
            }
        });
    },
    //Verificar que se a seleccionado solo un registro.
    confirmEdit: function()
    {
        var me = this;
        if (me.grid.selModel.getCount() === 1)
        {
            me.showChoferVehiculo('edit');
        }
        else if (me.grid.selModel.getCount() > 1)
        {
            Ext.ex.MessageBox('Atención', 'Solo puede editar un registro a la vez, por favor <b>seleccione solo uno</b>.', 'question');
        } else {
            Ext.ex.MessageBox('Atención', 'Seleccione el registro que desea editar.', 'question');
        }
    },
    // Editar datos de chofer-vehículo.
    editChoferVehiculo:  function (record)
    {
        var me = this;
        Ext.Ajax.request({
            url: entorno+'/transporte/chofer_vehiculo/edit',
            params: {
                Id         : me.win.chofervehiculoId,
                Permanente : record['permanente'],
                ChoferId   : me.choferId,
                VehiculoId : me.vehiculoId
            },
            success: function(response){
                switch(response.responseText){
                    case '':
                        me.loadStore();
                        me.win.close();
                        me.grid.selModel.deselectAll();
                        break;
                    case 'Unico':
                        Ext.ex.MessageBox('Atención', '<b><span style="color:red;">Ya está asignado ese chofer</span></b>, verifique la casilla en <b><span style="color:red;">rojo</span></b>.', 'question');
                        me.cleanComponentesUnicosForm();
                        break;
                    default:
                        Ext.ex.MessageBox('Error', response.responseText, 'error');
                        break;
                }
            },
            failure: function(){
                Ext.ex.MessageBox('Error','No se pudo conectar con el servidor, intentelo mas tarde.', 'error');
            }
        });
    },
    // Confirmar antes de eliminar datos.
    confirmRemuve: function()
    {
        var me = this;
        if (me.grid.selModel.getCount() === 1)
        {
            Ext.MessageBox.confirm('Confirmación', '¿Desea eliminar el registro seleccionado?', me.remove, me);
        }
        else if (me.grid.selModel.getCount() > 1)
        {
            Ext.MessageBox.confirm('Confirmación', '¿Desea eliminar los registros seleccionados?', me.remove, me);
        } else {
            Ext.ex.MessageBox('Atención', 'Seleccione el o los registro que desea eliminar.', 'question');
        }
    },
    // Eliminar datos.
    remove: function (btn)
    {
        if (btn === 'yes')
        {
            var me = this, ids = [];

            Ext.Array.each(me.grid.selModel.getSelection(), function (row)
            {
                ids.push(row.get('id'));
            });
            Ext.Ajax.request({
                url: entorno+'/transporte/chofer_vehiculo/remove',
                params: {
                    ids:  Ext.encode(ids)
                },
                success: function(response){
                    switch (response.responseText) {
                        case '':
                            me.loadStore();
                            break;
                        default:
                            Ext.ex.MessageBox('Error', response.responseText, 'error');
                            break;
                    }
                },
                failure: function(){
                    Ext.ex.MessageBox('Error','No se pudo conectar con el servidor, inténtelo más tarde.', 'error');
                }
            });
        }
    },


});
