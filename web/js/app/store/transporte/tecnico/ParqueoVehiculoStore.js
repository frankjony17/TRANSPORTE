
Ext.define('CDT.store.transporte.tecnico.ParqueoVehiculoStore', {
    extend: 'Ext.data.Store',

    fields: [ 'id', 'fechaEmision', 'fechaVencimiento', 'aprobado' , 'parqueoVehiculoTipo', 'areaParqueo', 'direccionAreaParqueo', 'choferVehiculo', 'matriculaId', 'chapa', 'vehiculoTipo', 'marca', 'modelo', 'chofer', 'cargoChofer', 'unidadOrganizativa', 'direccionUnidadOrganizativa'],
    autoLoad: true,
    sorters: 'fechaVencimiento',
    groupField: 'chapa',

    proxy: {
        type: 'ajax',
        url: entorno+'/transporte/parqueo/parqueo_vehiculo/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});