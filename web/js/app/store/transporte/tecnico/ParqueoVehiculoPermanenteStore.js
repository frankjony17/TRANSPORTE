
Ext.define('CDT.store.transporte.tecnico.ParqueoVehiculoPermanenteStore', {
    extend: 'Ext.data.Store',

    fields: [ 'id', 'fecha_emision', 'fecha_vencimiento', 'aprobado' , 'parqueo_vehiculo_tipo', 'area_arqueo_id', 'direccion_area_parqueo', 'chofer_vehiculo_id', 'matricula_id', 'chapa', 'tipo_vehiculo', 'marca', 'modelo', 'chofer', 'cargo_chofer', 'unidad_organizativa', 'direccion_unidad_organizativa'],
    autoLoad: true,
    sorters: 'fecha_vencimiento',
    groupField: 'chapa',

    proxy: {
        type: 'ajax',
        url: entorno+'/transporte/parqueo/parqueo_vehiculo/listpermanente',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});