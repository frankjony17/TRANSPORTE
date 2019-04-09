
Ext.define('CDT.view.transporte.tecnico.AutorizoParqueoMenu', {
    extend: 'Ext.menu.Menu',
    xtype: 'eventualMenu',

    closeAction : 'destroy',

    items: [{
        text: '<b>Autorización de Parqueo Eventual</b>',
        tooltip: 'Solicitud para parquear el vehículo fuera del área de parqueo establecida.',
        iconCls: 'fa fa-file',
        id: 'parqueo-eventual-id'
    },{
        text: '<b>Autorización de Parqueo Permanente</b>',
        tooltip: 'Solicitud para parquear el vehículo en un área de parqueo.',
        iconCls: 'fa fa-file-o',
        id: 'parqueo-permanente-id'
    }]
});
