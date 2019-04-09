
Ext.define('CDT.controller.transporte.tecnico.ParqueoVehiculoController', {
    extend: 'Ext.app.Controller',

    control: {
            'parqueovehiculoeventualGrid': {
                //edit: edit,
                // Mantiene el grid en una altura de acuerdo al navegador
                resize: function (grid) { grid.setHeight(Ext.ex.height('south-panel-id', 50)); },
                // Cuando el Grid es renderiado
                afterrender: function (grid, eOpts) { var me = this; me.grid = grid; me.store = grid.store; }
            },
            'parqueovehiculopermanenteGrid': {
                //edit: edit,
                // Mantiene el grid en una altura de acuerdo al navegador
                resize: function (grid) { grid.setHeight(Ext.ex.height('south-panel-id', 50)); },
                // Cuando el Grid es renderiado
                afterrender: function (grid, eOpts) { var me = this; me.grid = grid; me.store = grid.store; }
            }
    },
    loadStore: function () { var me = this; me.store.load(); }
    //Editar datos
    //edit: function (editor, context) {
    //
    //    var rec = context.record, myData = [];
    //
    //    this.grid.myData.push([{'Id': rec.get('control_transporte_id'), 'Fecha': rec.get('fecha'), 'HoraSalida': rec.get('hora_salida'), 'HoraEntrada': rec.get('hora_entrada'), 'Autorizado': rec.get('autorizado'), 'Observaciones': rec.get('observaciones')}]);
    //
    //    Ext.Ajax.request({
    //        url: entorno+'/transporte/control/parqueo/control_transporte/edit_add',
    //        params: {
    //            myData:  Ext.encode(myData)
    //        },
    //        // success: function (response) {
    //        //     switch (response.responseText) {
    //        //         case '':
    //        //             me.loadStore();
    //        //             Ext.ex.msg('Creación OK', 'Operación realizada exitosamente.');
    //        //             form.reset();
    //        //             break;
    //        //         case 'Unico':
    //        //             Ext.ex.MessageBox('Atención', 'Ya existe el Control del Transporte en la fecha: <b>'+record['Fecha']+'</b>', 'question');
    //        //             form.reset();
    //        //             break;
    //        //         default:
    //        //             Ext.ex.MessageBox('Error', response.responseText, 'error');
    //        //             break;
    //        //     }
    //        // },
    //        failure: function(){
    //            Ext.ex.MessageBox('Error','No se pudo conectar con el servidor, inténtelo más tarde.', 'error');
    //        }
    //    });
    //
    //    console.log(context.record);
    //}
});


