
Ext.define('CDT.view.transporte.especialista.vehiculo.VehiculoGrid', {
    extend : 'Ext.grid.Panel',
    xtype  : 'vehiculoGrid',
    
    width: '100%',
    border: false,
    selType: 'checkboxmodel',
    autoScroll: true,
    features: [{
        groupHeaderTpl: 'Área de parqueo: {name}',
        ftype: 'groupingsummary',
        collapsible: true
    }] ,  
    
    initComponent: function()
    {
        var me = this; // Ambito del componente.
        // Store 
        me.store = Ext.create('CDT.store.transporte.especialista.VehiculoStore');
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
            text: 'Matrícula',
            dataIndex: 'chapa',
            flex: 1,
            sortable: true,
            renderer: function(val) {
                return '<b>'+ val +'</b>';
            }
        },{
            text : 'Otros',
            columns: [{
                text: 'Marca',
                dataIndex: 'marca',
                width: 200,
                sortable: true
            }, {
                text: 'Modelo',
                dataIndex: 'modelo',
                width: 200,
                sortable: true
            }, {
                text: 'Tipo',
                dataIndex: 'vehiculoTipo',
                width: 200,
                sortable: true
            }]                
        }, {
            text: 'Área de Parqueo',
            dataIndex: 'areaParqueo',
            flex: 2,
            sortable: true
        }, {
            text: 'Area',
            dataIndex: 'area',
            hidden: true
        }, {
            text: 'MatriculaId',
            dataIndex: 'matriculaId',
            hidden: true
        }, {
            text: 'AreaId',
            dataIndex: 'area_id',
            hidden: true
        }, {
            text: 'AreaParqueoId',
            dataIndex: 'area_parqueo_id',
            hidden: true
        }];
        // Articulos de topbar: barra superior    
        me.tbar = [{
            text: 'Adicionar',
            tooltip: 'Adicionar vehículo',
            iconCls: 'fa fa-plus'
        },{
            text: 'Editar',
            tooltip: 'Editar vehículo',
            iconCls: 'fa fa-pencil'
        },'',{
            text: 'Eliminar',
            tooltip: 'Eliminar vehículo',
            iconCls: 'fa fa-times'
        },'->',{
            tooltip: 'Cambiar situación operativa del vehículo.',
            iconCls: 'fa fa-leanpub'
        },'',{
            tooltip: 'Ayuda acerca de trabajador.',
            iconCls: 'fa fa-question'
        }];
        // Carga nuestra configuaración y se la pasa al componente del que heredamos.  
        me.callParent(arguments);
    }
});