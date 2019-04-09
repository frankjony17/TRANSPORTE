
Ext.define('CDT.view.transporte.especialista.chofer_vehiculo.ChoferVehiculoGrid', {
    extend : 'Ext.grid.Panel',
    xtype  : 'chofervehiculoGrid',

    width: '100%',
    border: false,
    selType: 'checkboxmodel',
    autoScroll: true,

    features: [{
        groupHeaderTpl: 'Matrícula: {name}',
        ftype: 'groupingsummary',
        collapsible: true
    }],

    initComponent: function()
    {
        var me = this; // Ambito del componente.
        // Store
        me.store = Ext.create('CDT.store.transporte.especialista.ChoferVehiculoStore');
        // Modelo de columna
        me.columns = [
            {
                xtype : 'rownumberer',
                text  : 'No',
                width : 39,
                align : 'center'
            }, {
                text: 'Id',
                dataIndex: 'id',
                width: 35,
                hidden: true
            }, {
                text: 'Nombre del chofer',
                dataIndex: 'chofer',
                flex: 4
            }, {
                text: 'Permanente',
                dataIndex: 'permanente',
                align: 'center',
                flex: 1,
                renderer: function(val) {
                    if ( val === 'SI' ) {
                        return '<img src=\"/images/transporte/flag-si.png\"/>';
                    } else {
                        return '<img src=\"/images/transporte/flag-no.png\"/>';
                    }
                }
            }, {
                text: 'ChoferId',
                dataIndex: 'chofer_id',
                hidden: true
            },{
                text: 'VehiculoId',
                dataIndex: 'vehiculo_id',
                hidden: true
            }
        ];
        // Articulos de topbar: barra superior
        me.tbar = [
           {
           text: 'Adicionar',
           tooltip: 'Adicionar Chofer-Vehículo',
           iconCls: 'fa fa-plus'
        },{
           text: 'Editar',
           tooltip: 'Editar Chofer-Vehículo',
           iconCls: 'fa fa-pencil'
        },'',{
           text: 'Eliminar',
           tooltip: 'Eliminar Chofer-Vehículo',
           iconCls: 'fa fa-times'
        },'->',{
            tooltip: 'Ayuda acerca de Chofer-Vehículo.',
            iconCls: 'fa fa-question'
        }];
        me.callParent(arguments);
    }
});