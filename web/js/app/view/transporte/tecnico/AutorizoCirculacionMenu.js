
Ext.define('CDT.view.transporte.tecnico.AutorizoCirculacionMenu', {
    extend: 'Ext.menu.Menu',
    xtype: 'eventualMenu',

    closeAction : 'destroy',

    items: [{
        text: '<b>Autorización de Circulación Eventual (Ordinaria)</b>',
        tooltip: 'Solicitud para circular el vehículo en horario extra laboral aprobado por el director.',
        iconCls: 'fa fa-building',
        id: 'circulacion-eventual-ordinaria-id'
    },{
        text: '<b>Autorización de Circulación Eventual (Extraordinaria)</b>',
        tooltip: 'Solicitud para circular el vehículo en horario extra laboral aprobado por el técnico.',
        iconCls: 'fa fa-building-o',
        id: 'circulacion-eventual-extraordinaria-id'
    }]
});