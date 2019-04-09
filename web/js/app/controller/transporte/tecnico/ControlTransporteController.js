
Ext.define('CDT.controller.transporte.tecnico.ControlTransporteController', {
    extend: 'Ext.app.Controller',

    control: {
        'controltransporteGrid': {
            edit: "edit",
            // Mantiene el grid en una altura de acuerdo al navegador
            resize: function (grid) { grid.setHeight(Ext.ex.height('south-panel-id', 50)); },
            // Cuando el Grid es renderiado
            afterrender: function (grid, eOpts) {
                var me = this;
                me.grid = grid;
                me.store = grid.store;

                me.store.each(function (rec) {
                    console.log(rec);
                });
            }
        },
        '#button-control-transporte-save': {
            click: "saveControlTransporte"
        },
        '#button-control-transporte-pdf': {
            click: "pdfControlTransporte"
        }
    },
    loadStore: function () {
        var me = this; me.store.load();
        this.grid.myData = [];
    },
    // Editar datos
    edit: function (editor, context) {
        var rec = context.record;
        if (this.valueExist(rec)) {
            this.grid.myData.push([
                rec.get('control_transporte_id'),
                rec.get('hora_salida'),
                rec.get('hora_entrada'),
                rec.get('autorizado'),
                rec.get('observaciones'),
                rec.get('chofer_vehiculo_id')
            ]);
        }
    },
    valueExist: function (rec) {
        for (var i = 0; i < this.grid.myData.length; i++) {
            if (this.grid.myData[i][5] === rec.get('chofer_vehiculo_id')) {
                this.grid.myData[i][0] = rec.get('control_transporte_id');
                this.grid.myData[i][1] = rec.get('hora_salida');
                this.grid.myData[i][2] = rec.get('hora_entrada');
                this.grid.myData[i][3] = rec.get('autorizado');
                this.grid.myData[i][4] = rec.get('observaciones');
                this.grid.myData[i][5] = rec.get('chofer_vehiculo_id');
                return false;
            }
        }
        return true;
    },
    saveControlTransporte: function () {
        var me = this;
        Ext.Ajax.request({
            url: '../transporte/control/parqueo/control_transporte/edit_add',
            params: {
                data: Ext.encode(me.grid.myData)
            },
            success: function (response) {
                me.grid.myData = [];
                me.loadStore();
                if (response.responseText == 0) {
                    Ext.toast('Operación realizada con éxito.', 'Operación OK');
                } else {
                    Ext.toast("<b>"+response.responseText+"</b> registros sin actualizar.", 'Atención OK');
                }
            },
            failure: function () {
                me.loadStore();
            }
        });
    },
    /* PDF */
    pdfControlTransporte: function () {
        //var me = this;
        Ext.Ajax.request({
            url: '../transporte/control/parqueo/reporte/control-transporte',
            success: function (response) {
                Ext.create('Ext.window.Window',{
                    title: 'PDF Control de Transporte',
                    width: 900,
                    height: 600,
                    maximizable: true,
                    plain: true,
                    autoShow: true,
                    items: {
                        xtype: 'component',
                        autoEl: {
                            tag: 'iframe',
                            style: 'height: 100%; width: 100%; border: none',
                            src: "../"+ response.responseText
                        }
                    }
                });
            },
            failure: function (response) {
                Ext.ex.MessageBox('Error', response.responseText, Ext.Msg.ERROR);
            }
        });
    },
});


