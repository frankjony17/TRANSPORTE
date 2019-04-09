
Ext.define('CDT.view.transporte.tecnico.control_transporte.ControlTransporteGrid', {
    extend : 'Ext.grid.Panel',
    xtype  : 'controltransporteGrid',
    
    width: '100%',
    border: false,
    selType: 'checkboxmodel',
    autoScroll: true,
    features: [{
        groupHeaderTpl: 'Área de parqueo: {name}',
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
        me.store = Ext.create('CDT.store.transporte.tecnico.ControlTransporteStore');
        // Modelo de columna      
        me.columns = [{
            xtype : 'rownumberer',
            text  : 'No',
            width : 39,
            align : 'center'
        }, {
            text: 'Id',
            dataIndex: 'control_transporte_id',
            width: 35,
            hidden: true
        }, {
            text: 'Matrícula',
            dataIndex: 'chapa',
            flex: 1,
            renderer: function(val) {
                return '<b>'+ val +'</b>';
            }
        },{
            text: 'Nombre del chofer',
            dataIndex: 'chofer',
            sortable: true,
            flex: 4
        },{
            text: 'Área de parqueo',
            dataIndex: 'area_parqueo',
            flex: 2,
            hidden: true,
            editor: {
                xtype: 'textfield',
                maskRe: /[aA-zZ\ \áéíóúñÁÉÍÓÚÑ]/,
                regex: /[aA-zZ]/,
                maxLength: 43,
                allowBlank: false
            }   
        },{
            text: 'Área',
            dataIndex: 'area',
            flex: 1,
            hidden: true,   
        },{
            text: 'Unidad Organizativa',
            dataIndex: 'unidad_organizativa',
            flex: 1,
            hidden: true,   
        },{
            text : 'Horario',
            columns: [{
                text: 'Hora de salida',
                dataIndex: 'hora_salida',
                flex: 1,
                editor: {
                    xtype: 'timefield',
                    format: 'H:i:s'             
                }
            }, {
                text: 'Hora de entrada',
                dataIndex: 'hora_entrada',
                flex: 1,
                editor: {
                    xtype: 'timefield',
                    minValue: '8:00 AM',
                    maxValue: '10:00 PM',
                    increment: 30            
                }
            }]            
        },{
            text: 'Autorizado',
            dataIndex: 'autorizado',
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
            text: 'Observaciones',
            dataIndex: 'observaciones',
            flex: 3,
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
            tooltip: 'Guardar cambios del control de transporte',
            iconCls: 'fa fa-save'
        },{
                xtype: 'tbseparator',
                width: 25
        },{
            tooltip: 'Ayuda acerca de control del transporte.',
            iconCls: 'fa fa-question-circle'
        }];
        // Carga nuestra configuaración y se la pasa al componente del que heredamos.  
        me.callParent(arguments);
    }
});