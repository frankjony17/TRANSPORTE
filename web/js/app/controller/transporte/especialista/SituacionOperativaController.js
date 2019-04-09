
Ext.define('CDT.controller.transporte.especialista.SituacionOperativaController', {
    extend: 'Ext.app.Controller',

    control:{
            'situacionoperativaGrid': {
                edit: "edit",
                resize: function (grid) { grid.setHeight(Ext.ex.height('south-panel-id', 50)); },
                afterrender: function (grid, eOpts) { var me = this; me.grid = grid; me.store = grid.store; }
            },
            'situacionoperativaGrid button[iconCls=fa fa-plus]': {
                click: "showSituacionOperativa"
            },
            'situacionoperativaGrid button[iconCls=fa fa-times]': {
                click: "confirmRemuve"
            },
            'situacionoperativaForm': {
                afterrender: "afterRenderWin"
            },
            // Formulario
            'situacionoperativaForm button[iconCls=fa fa-check-circle-o]': {
                click: "validateForm"
            }
    },
    loadStore: function () { var me = this; me.store.load(); },
    // Mostrar Windows Situacion Operativa.
    showSituacionOperativa: function()
    {
        Ext.create('CDT.view.transporte.especialista.situacion_operativa.SituacionOperativaForm');
    },
    // Cuando la ventana del formulario es renderiada.
    afterRenderWin: function (win, eOpts)
    {
        var me = this;
        me.win = win;
        me.form = win.down('form');
    },
    // Validar formulario.
    validateForm : function ()
    {
        var me = this;

        if (me.form.getForm().isValid()) {
            me.addSituacionOperativa(me.form.getForm().getValues(), me.form.getForm());
        } else {
            Ext.ex.MessageBox('Atención', '<b><span style="color:red;">Formulario no válido</span></b>, verifique las casillas en <b><span style="color:red;">rojo</span></b>.', 'info');
        }
    },
    // Insertar datos de la situacion operativa.
    addSituacionOperativa: function (record, form)
    {
        var me = this;
        Ext.Ajax.request({
            url: entorno+'/transporte/situacion_operativa/add',
            params: {
                Nombre    : record['Nombre'],
                Descripcion : record['Descripcion']
            },
            success: function (response) {
                switch (response.responseText) {
                    case '':
                        me.loadStore();
                        Ext.ex.msg('Creación OK', 'Operación realizada exitosamente.');
                        form.reset();
                        break;
                    case 'Unico':
                        Ext.ex.MessageBox('Atención', 'Ya existe la Situación Operativa: <b>'+record['Nombre']+'</b>', 'question');
                        form.reset();
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
    // Editar datos.
    edit: function (editor, context, eOpts)
    {
        var me = this;
        Ext.Ajax.request({
            url: entorno+'/transporte/situacion_operativa/edit',
            params: {
                Id              : context.record.get('id'),
                Nombre          : context.record.get('nombre'),
                Descripcion     : context.record.get('descripcion')
            },
            success: function(response){
                switch(response.responseText){
                    case '':
                        me.loadStore();
                        break;
                    case 'Unico':
                        Ext.ex.MessageBox('Atención', 'Ya existe la Situación Operativa: <b>'+context.record.get('nombre')+'</b>', 'question');
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
                url: entorno+'/transporte/situacion_operativa/remove',
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
    }
});



