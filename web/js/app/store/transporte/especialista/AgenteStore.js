
Ext.define('CDT.store.transporte.especialista.AgenteStore', {
    extend: 'Ext.data.Store',

    fields: ['id', 'nombreApellidos'],
    autoLoad: true,
    sorters: 'nombreApellidos',

    proxy: {
        type: 'ajax',
        url: entorno+'/transporte/control/parqueo/agente/list',
        reader : {
            type            : 'json',
            root            : 'data',
            totalProperty   : 'total',
            successProperty : 'success'
        }
    }
});