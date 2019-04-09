
Ext.define('CDT.view.transporte.especialista.OpcionesMenu', {
    extend: 'Ext.menu.Menu',
    xtype: 'eventualMenu',

    closeAction : 'destroy',

    items: [{
        text: 'Reportes',
        menu: Ext.create('CDT.view.transporte.especialista.ReporteMenu'),
        iconCls: 'fa fa-file-text'
    },"-",{
        text: 'Aplicaciones',
        menu: Ext.create('CDT.view.AplicacionesMenu',{ appId: 'transporte-app-especialista-id' }),
        iconCls: 'fa fa-unlock'
    }]
});

