
Ext.define('CDT.view.transporte.tecnico.parqueo_vehiculo.ParqueoVehiculoGrid', {
    extend : 'Ext.grid.Panel',
    xtype  : 'parqueovehiculoGrid',

    width: '100%',
    border: false,
    selType: 'checkboxmodel',
    autoScroll: true,
    features: [{
        groupHeaderTpl: 'Matrícula: {name}',
        ftype: 'groupingsummary',
        collapsible: true
    }],
    plugins: {
        ptype: 'cellediting',
        clicksToEdit: 1
    },
    initComponent: function () {
        var me = this; // Ambito del componente.

        me.myData = [];
        // Store
        //me.store = Ext.create('CDT.store.transporte.tecnico.ParqueoVehiculoStore');
        // Modelo de columna
        me.columns = [{
            xtype : 'rownumberer',
            text  : 'No',
            width : 39,
            align : 'center'
        }, {
            text: 'Id',
            dataIndex: 'id',
            width: 35,
            hidden: true
        },{
            text : 'Fecha',
            columns: [{
                text: 'Fecha emisión',
                dataIndex: 'fechaEmision',
                flex: 1,                
                editor: {
                    xtype: 'datefield',
                    format: 'Y-m-d'
                }
            }, {
                text: 'Fecha vencimiento',
                dataIndex: 'fechaVencimiento',
                flex: 1,
                editor: {
                    xtype: 'datefield',
                    format: 'Y-m-d'
                }
            }]
        },{
            text: 'Nombre del chofer',
            dataIndex: 'chofer',
            sortable: true,
            flex: 4
        },{
            text: 'Cargo',
            dataIndex: 'cargoChofer',
            sortable: true,
            flex: 2,
            hidden: true
        },{
            text: 'Área de parqueo',
            dataIndex: 'areaParqueo',
            sortable: true,
            flex: 2
        },{
            text: 'Dirección particular',
            dataIndex: 'direccionAreaParqueo',
            flex: 4,
            editor: {
                xtype: 'textfield',
                maskRe: /[aA-zZ\áéíóúñÁÉÍÓÚÑ\ \.\,]/,
                regex: /[aA-zZ]/,
                maxLength: 118
            } 
        },{
            text : 'Vehículo',
            flex: 4,
            hidden: true,
            columns: [{
                text: 'Matrícula',
                dataIndex: 'chapa',
                renderer: function(val) {
                    return '<b>'+ val +'</b>';
                }
            },{
                text: 'Marca',
                dataIndex: 'marca',
                sortable: true
            },{
                text: 'Modelo',
                dataIndex: 'modelo',
                sortable: true
            },{
                text: 'Tipo',
                dataIndex: 'vehiculoTipo',
                sortable: true
            }]                
        },{
            text: 'Aprobado',
            dataIndex: 'aprobado',
            align: 'center',
            flex: 1,
            hidden: true,
            renderer: function(val) {
                if ( val === 'SI' ) {
                    return '<img src=\"/images/transporte/flag-si.png\"/>';
                } else {
                    return '<img src=\"/images/transporte/flag-no.png\"/>';
                }
            }
        },{
            text: 'Tipo parqueo',
            dataIndex: 'parqueoVehiculoTipo',
            sortable: true,
            flex: 2,
            hidden: true
        },{
            text: 'Unidad Organizativa',
            dataIndex: 'unidad_organizativa',
            flex: 1,
            hidden: true,   
        },{
            text: 'Dirección UO',
            dataIndex: 'direccionUnidadOrganizativa',
            flex: 3,
            hidden: true, 
            editor: {
                xtype: 'textfield',
                maskRe: /[aA-zZ\áéíóúñÁÉÍÓÚÑ\ \.\,]/,
                regex: /[aA-zZ]/,
                maxLength: 118
            } 
        },{
            text: 'MatrículaID',
            dataIndex: 'matricula_id',
            hidden: true
        }, {
            text: 'ChoferVehículoID',
            dataIndex: 'choferVehiculo',
            hidden: true
        }];
        // Barra superior
        // me.tbar = [];
        // Articulos de topbar: barra derecha
        me.rbar = [
            {
                tooltip: 'Guardar cambios del parqueo de vehículo.',
                iconCls: 'fa fa-save'
            },{
                xtype: 'tbseparator',
                width: 25
            },{
                tooltip: 'Ayuda acerca del parqueo de vehículo.',
                iconCls: 'fa fa-question-circle'
            }];
        // Carga nuestra configuaración y se la pasa al componente del que heredamos.
        me.callParent(arguments);
    }
});