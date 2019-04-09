
Ext.define('CDT.controller.transporte.tecnico.CirculacionEventualController', {
    extend: 'Ext.app.Controller',

    control: {
            'circulacioneventualGrid': {
                //edit: me.edit,
                // Mantiene el grid en una altura de acuerdo al navegador
                resize: function (grid) { grid.setHeight(Ext.ex.height('south-panel-id', 50)); },
                // Cuando el Grid es renderiado
                afterrender: function (grid, eOpts) { var me = this; me.grid = grid; me.store = grid.store; }
            }
    },
    loadStore: function () { var me = this; me.store.load(); }
    //Editar datos
    // edit: function (editor, context) {
    
    //    var rec = context.record, myData = [];
    
    //    this.grid.myData.push([{'Id': rec.get('circulacion_eventual_id'), 'FechaInicial': rec.get('fecha_inicial'), 'FechaFinal': rec.get('fecha_final'), 'HoraInicial': rec.get('hora_inicial'), 'HoraFinal': rec.get('horaFinal'), 'Aprobado': rec.get('aprobado'), 'Pendiente': rec.get('pendiente'), 'Tarea': rec.get('tarea'), 'CirculacionEventualTipo': rec.get('circulacion_eventual_tipo')}]);
    
    //    Ext.Ajax.request({
    //        url: entorno+'/transporte/circulacion/eventual/circulacion_eventual/edit_add',
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
    
    //    console.log(context.record);
    // }
});


