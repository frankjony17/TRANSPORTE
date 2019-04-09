
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
            // Cargar formulario con los datos del registro seleccionado del grid.
            form.loadRecord(record);
        }
        // Mostrar ventana.
        win.show();
    },
});
