
Ext.define('CDT.store.transporte.especialista.ChoferVehiculoStore', {
    extend: 'Ext.data.Store',

    fields: ['id', 'permanente', 'chofer', 'chofer_id', 'vehiculo'],
    autoLoad: true,
    sorters: 'chofer',
    groupField: 'vehiculo',

    proxy: {
        type: 'ajax',
        url: entorno+'/transporte/chofer_vehiculo/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});