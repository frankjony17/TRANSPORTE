
Ext.define('CDT.controller.transporte.TecnicoViewportController', {
    extend: 'Ext.app.Controller',


    control: {
        '#transporte-logout': {
            click: "logout"
        },
        '#horario-id': {
            click: "horarioMenuClick"
        },
        '#circulacion-eventual-ordinaria-id': {
            click: "circulacioneventualordinariaMenuClick"
        },
        '#circulacion-eventual-extraordinaria-id': {
            click: "circulacioneventualextraordinariaMenuClick"
        },
        '#parqueo-eventual-id': {
            click: "parqueoeventualMenuClick"
        },
        '#parqueo-permanente-id': {
            click: "parqueopermanenteMenuClick"
        },
        '#cerrar': {
            click: "removeComponent"
        }        
    },
    // mm: function(){

    //     console.log("algo");
    // },
    // Desloguear usuario
    logout: function()
    {
         location.href = entorno+'/secured/logout';
    },
    // Menu Horario Parqueo.
    horarioMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.tecnico.control_transporte.ControlTransporteGrid'));
        this.updateStatusBar('<b>Gestionar > Control del Transporte</b>');
    },
    // Menu Circulación Eventual Ordinaria.
    circulacioneventualordinariaMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.tecnico.circulacion_eventual.CirculacionEventualOrdinariaGrid'));
        this.updateStatusBar('<b>Gestionar > Circulación Eventual Ordinaria</b>');
    },
    // Menu Circulación Eventual Extraordinariaordinaria.
    circulacioneventualextraordinariaMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.tecnico.circulacion_eventual.CirculacionEventualExtraordinariaGrid'));
        this.updateStatusBar('<b>Gestionar > Circulación Eventual Extraordinaria</b>');

    },
    // Menu Autorizo de Parqueo Eventual.
    parqueoeventualMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.tecnico.parqueo_vehiculo.ParqueoVehiculoEventualGrid'));
        this.updateStatusBar('<b>Gestionar > Parqueo Eventual</b>');
    },
    // Menu Autorizo de Parqueo Permanente.
    parqueopermanenteMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.tecnico.parqueo_vehiculo.ParqueoVehiculoPermanenteGrid'));
        this.updateStatusBar('<b>Gestionar > Parqueo Permanente</b>');

    },
    // Add componente en el panel.
    addComponent: function (cmp)
    {
        var center_panel = Ext.getCmp('center-panel-id');
        
        center_panel.removeAll();
        center_panel.add(cmp);
    },
    // Eliminar componente del center panel.
    removeComponent: function (cmp)
    {
        var center_panel = Ext.getCmp('center-panel-id');
        
        center_panel.removeAll();
        
        this.updateStatusBar('>');
    },
    // Update detalle de barra de estado.
    updateStatusBar: function (texto)
    {
        var status_bar = Ext.getCmp('status-bar-detalles');
        
        status_bar.update('<b><span style="color:#000;">'+texto+'</span></b>');
    }

});



