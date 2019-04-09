
Ext.define('CDT.view.transporte.tecnico.OpcionesMenu', {
    extend: 'Ext.menu.Menu',
    xtype: 'eventualMenu',

    closeAction : 'destroy',

    items: [{
        text: 'Reportes',
        menu: Ext.create('CDT.view.transporte.tecnico.ReporteMenu'),
        iconCls: 'fa fa-file-text'
    },"-",{
        text: 'Aplicaciones',
        menu: Ext.create('CDT.view.AplicacionesMenu',{ appId: 'transporte-app-tecnico-id' }),
        iconCls: 'fa fa-unlock'
    }]
});

