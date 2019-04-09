
Ext.define('CDT.store.admin.OtrosTreeStore', {
    extend : 'Ext.data.TreeStore',

    root: {
        expanded : true,
        children: [{
            text: '<b>Reportes</b>',
            iconCls: 'tree-reportes',
            id: 'tree-reportes-id',
            leaf: true
        },{
            text: '<b>Ayuda</b>',
            iconCls : 'tree-ayuda',
            id: 'tree-ayuda-id',
            leaf: true
        }]
    }
});