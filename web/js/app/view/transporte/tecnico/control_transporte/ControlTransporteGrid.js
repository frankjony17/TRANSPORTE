
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
    plugins: [{
        ptype: 'cellediting',
        clicksToEdit: 1
    }],
    initComponent: function () {
        var me = this; me.myData = []; me.horaSalida = 0;
        this.stateEvents = 'storeready';
        // Store
        me.store = Ext.create('CDT.store.transporte.tecnico.ControlTransporteStore',{
            grid: me
        });
        this.viewConfig = {
            getRowClass: function(record, index) {
                if (record.get('fuera_estado')) {
                    return 'fuera-tiempo parqueo-tiempo';
                } else {
                    return 'en-tiempo parqueo-tiempo';
                }
            }
        };
        me.editor1 = Ext.create('Ext.form.field.Text', {
            maskRe: /[\d\-]/,
            regex: /^\d{4}$/,
            validator: function(hora){
                if (hora.length > 3) {
                    var h = hora.slice(0, 2), m = hora.slice(2, 4);
                    if(h < 24){
                        if(m < 60){
                            return true;
                        } else {
                            return "Valor invalido de tiempo: <b>(Minutos => 0-59)</b>.";
                        }
                    } else {
                        return "Valor invalido de tiempo: <b>(Hora => 0-23)</b>.";
                    }
                }
                return true;
            }
        });
        me.editor2 = Ext.create('Ext.form.field.Text', {
            maskRe: /[\d\-]/,
            regex: /^\d{4}$/,
            validator: function(hora){
                if (hora.length > 3) {
                    var h = hora.slice(0, 2), m = hora.slice(2, 4), horaSalida = Ext.getCmp('textfield-hora-salida');
                    if (hora > me.editor1.getValue()) {
                        if (h < 24) {
                            if (m < 60) {
                                return true;
                            } else {
                                return "Valor invalido de tiempo: <b>(Minutos => 0-59)</b>.";
                            }
                        } else {
                            return "Valor invalido de tiempo: <b>(Hora => 0-23)</b>.";
                        }
                    } else {
                        return "Hora entrada debe ser mayor que Hora salida.";
                    }
                }
                return true;
            }
        });
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
            flex: 2,
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
            text : 'Horario (Tiempo)',
            flex: 2,
            columns: [{
                text: 'Salida',
                dataIndex: 'hora_salida',
                align: 'center',
                editor: me.editor1
            }, {
                text: 'Entrada',
                dataIndex: 'hora_entrada',
                align: 'center',
                editor: me.editor2
            },{
                text: 'Parqueo',
                dataIndex: 'hora_parqueo',
                align: 'center',
                tdCls: 'x-parqueo-cell',
                width: 80
            },{
                text: '<img src=\"/images/clock.png\"/>',
                dataIndex: 'fuera_tiempo',
                tooltip: 'Diferencia de tiempo de la hora en que tiene que parquear y la que realmente parqueo',
                align: 'center',
                tdCls: 'x-change-cell',
                width: 80
            }]
        },{
            text: 'Observaciones',
            dataIndex: 'observaciones',
            flex: 4,
            editor: {
                xtype: 'textfield',
                maskRe: /[aA-zZ\áéíóúñÁÉÍÓÚÑ\ \.\,]/,
                regex: /[aA-zZ]/,
                maxLength: 118
            } 
        },{
            text: '<img src=\"/images/help.png\"/>',
            xtype: 'checkcolumn',
            tooltip: 'Si está autorizado o no',
            dataIndex: 'autorizado',
            align: 'center',
            editor: {
                xtype: 'checkbox'
            },
            flex: 1
        },{
            text: 'MatrículaID',
            dataIndex: 'matricula_id',
            hidden: true
        }, {
            text: 'ChoferVehículoID',
            dataIndex: 'chofer_vehiculo_id',
            hidden: true
        }, {
            text: 'Fuera de estado',
            dataIndex: 'fuera_estado',
            hidden: true
        }];
        // Articulos de topbar: barra derecha
        me.rbar = [{
            tooltip: 'Guardar cambios del control de transporte',
            iconCls: 'fa fa-save',
            id: 'button-control-transporte-save'
        },{
            tooltip: 'Generar reporte (PDF)',
            iconCls: 'fa fa-file-pdf-o',
            id: 'button-control-transporte-pdf'
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