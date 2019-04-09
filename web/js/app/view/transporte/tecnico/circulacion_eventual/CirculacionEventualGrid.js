
Ext.define('CDT.view.transporte.tecnico.circulacion_eventual.CirculacionEventualGrid', {
    extend : 'Ext.grid.Panel',
    xtype  : 'circulacioneventualGrid',

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
        me.store = Ext.create('CDT.store.transporte.tecnico.CirculacionEventualStore');
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
                text: 'Fecha inicial',
                dataIndex: 'fecha_inicial',
                flex: 1,
                editor: {
                    xtype: 'datefield',
                    format: 'Y-m-d'
                }
            }, {
                text: 'Fecha final',
                dataIndex: 'fecha_final',
                flex: 1,
                editor: {
                    xtype: 'datefield',
                    format: 'Y-m-d'
                }
            }]
        },{
            text : 'Hora',
            columns: [{
                text: 'Hora inicial',
                dataIndex: 'hora_inicial',
                flex: 1,
                editor: {
                    xtype: 'timefield',
                    format: 'H:i:s'
                }
            }, {
                text: 'Hora final',
                dataIndex: 'hora_final',
                flex: 1,
                editor: {
                    xtype: 'timefield',
                    format: 'H:i:s'
                }
            }]
        },{
            text: 'Nombre del chofer',
            dataIndex: 'chofer',
            sortable: true,
            flex: 4
        },{
            text: 'Tarea',
            dataIndex: 'tarea',
            flex: 4,
            editor: {
                xtype: 'textfield',
                maskRe: /[aA-zZ\áéíóúñÁÉÍÓÚÑ\ \.\,]/,
                regex: /[aA-zZ]/,
                maxLength: 118
            }
        },{
            text: 'Licencia',
            dataIndex: 'licencia',
            flex: 2,
            hidden: true,
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
            text: 'Pendiente',
            dataIndex: 'pendiente',
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
            text: 'Tipo circulación',
            dataIndex: 'circulacion_eventual_tipo',
            sortable: true,
            flex: 1,
            hidden: true
        },{
            text: 'Unidad Organizativa',
            dataIndex: 'unidad_organizativa',
            flex: 2,
            hidden: true,   
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
                tooltip: 'Guardar cambios de la circulación eventual.',
                iconCls: 'fa fa-save'
            },{
                xtype: 'tbseparator',
                width: 25
            },{
                tooltip: 'Ayuda acerca de la circulación eventual.',
                iconCls: 'fa fa-question-circle'
            }];
        // Carga nuestra configuaración y se la pasa al componente del que heredamos.
        me.callParent(arguments);
    }
});