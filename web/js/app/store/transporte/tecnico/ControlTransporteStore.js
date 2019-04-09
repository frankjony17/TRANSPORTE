
Ext.define('CDT.store.transporte.tecnico.ControlTransporteStore', {
    extend: 'Ext.data.Store',
    
    fields: ['chapa', 'chofer', 'area_parqueo', 'area', 'unidad_organizativa', 'hora_entrada', 'hora_salida', 'hora_parqueo', 'fuera_tiempo', 'fuera_estado', 'autorizado', 'observaciones', 'fecha', 'matricula_id', 'control_transporte_id', 'chofer_vehiculo_id'],
    autoLoad: true,
    sorters: 'area_parqueo',
    groupField: 'area_parqueo',
    
    proxy: {
        type: 'ajax',
        url: entorno+'/transporte/control/parqueo/control_transporte/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});