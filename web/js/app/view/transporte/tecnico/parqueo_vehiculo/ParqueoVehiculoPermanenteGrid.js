
Ext.define('CDT.view.transporte.tecnico.parqueo_vehiculo.ParqueoVehiculoPermanenteGrid', {
    extend : 'Ext.grid.Panel',
    xtype  : 'parqueovehiculopermanenteGrid',

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
        me.store = Ext.create('CDT.store.transporte.tecnico.ParqueoVehiculoPermanenteStore');
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
            flex: 1,
            columns: [{
                text: 'Emisión',
                dataIndex: 'fecha_emision', 
                align: 'center',             
                editor: {
                    xtype: 'datefield',
                    format: 'd-m-Y'
                }
            }, {
                text: 'Vencimiento',
                dataIndex: 'fecha_vencimiento',
                align: 'center',
                editor: {
                    xtype: 'datefield',
                    format: 'd-m-Y'
                }
            }]
        },{
            text: 'Nombre del chofer',
            dataIndex: 'chofer',
            sortable: true,
            flex: 4
        },{
            text: 'Cargo',
            dataIndex: 'cargo_chofer',
            sortable: true,
            flex: 2,
            hidden: true
        },{
            text: 'Área de parqueo',
            dataIndex: 'area_arqueo_id',
            sortable: true,
            flex: 2
        },{
            text: 'Dirección particular',
            dataIndex: 'direccion_area_parqueo',
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
                dataIndex: 'tipo_vehiculo',
                sortable: true
            }]                
        },{
            text: '<img src=\"/images/help.png\"/>',
            xtype: 'checkcolumn',
            tooltip: 'Si está aprobado o no',
            dataIndex: 'aprobado',
            align: 'center',
            editor: {
                xtype: 'checkbox'
            },
            flex: 1
        },{
            text: 'Tipo parqueo',
            dataIndex: 'parqueo_vehiculo_tipo',
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
            dataIndex: 'direccion_unidad_organizativa',
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
            dataIndex: 'chofer_vehiculo_id',
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