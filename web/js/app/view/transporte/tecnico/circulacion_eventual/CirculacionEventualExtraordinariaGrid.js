
Ext.define('CDT.view.transporte.tecnico.circulacion_eventual.CirculacionEventualExtraordinariaGrid', {
    extend : 'Ext.grid.Panel',
    xtype  : 'circulacioneventualextraordinariaGrid',

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
        me.store = Ext.create('CDT.store.transporte.tecnico.CirculacionEventualExtraordinariaStore');
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
                text: 'Inicial',
                dataIndex: 'fecha_inicial',
                align: 'center',
                editor: {
                    xtype: 'datefield',
                    format: 'd-m-Y',
                    editable: false
                }
            }, {
                text: 'Final',
                dataIndex: 'fecha_final',
                align: 'center',
                editor: {
                    xtype: 'datefield',
                    format: 'd-m-Y',
                    editable: false
                }
            }]
        },{
            text : 'Hora',
            flex: 1,
            columns: [{
                text: 'Inicial',
                dataIndex: 'hora_inicial',
                align: 'center',
                editor: {
                    xtype: 'textfield',
                    maskRe: /[\d\-]/,
                    regex: /^\d{4}$/,
                }
            }, {
                text: 'Final',
                dataIndex: 'hora_final',
                align: 'center',
                editor: {
                    xtype: 'textfield',
                    maskRe: /[\d\-]/,
                    regex: /^\d{4}$/,
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
            text: '<img src=\"/images/help.png\"/>',
            xtype: 'checkcolumn',
            tooltip: 'Si está pendiente o no',
            dataIndex: 'pendiente',
            align: 'center',
            editor: {
                xtype: 'checkbox'
            },
            flex: 1
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