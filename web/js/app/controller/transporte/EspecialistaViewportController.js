
Ext.define('CDT.controller.transporte.EspecialistaViewportController', {
    extend: 'Ext.app.Controller',
    

    control: {
            '#transporte-logout': {
                click: "logout"
            },
            '#chofer-id': {
                click: "choferMenuClick"
            },
            '#matricula-id': {
                click: "matriculaMenuClick"
            },
            '#vehiculo-id': {
                click: "vehiculoMenuClick"
            },
            '#chofer-vehiculo-id': {
                click: "choferVehiculoMenuClick"
            },
            '#area-parqueo-id': {
                click: "areaParqueoMenuClick"
            },
            '#situacion-operativa-id': {
                click: "situacionOperativaMenuClick"
            },
            '#tipo-vehiculo-id': {
                click: "tipoVehiculoMenuClick"
            },
            '#modelo-id': {
                click: "modeloMenuClick"
            },
            '#marca-id': {
                click: "marcaMenuClick"
            },
            '#agente-id': {
                click: "agenteMenuClick"
            },
            '#cerrar': {
                click: "removeComponent"
            }
    },
    // Desloguear usuario.
    logout: function ()
    {
        location.href = entorno+'/secured/logout';
    },
    // Menu Nomenclador, button chofer.
    choferMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.especialista.chofer.ChoferGrid'));
        this.updateStatusBar('<b>Gestionar > Choferes</b>');
    },
    // Menu Nomenclador, button matricula.
    matriculaMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.especialista.matricula.MatriculaGrid'));
        this.updateStatusBar('<b>Gestionar > Matrícula</b>');
    },
    // Menu Nomenclador, button vehiculo.
    vehiculoMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.especialista.vehiculo.VehiculoGrid'));
        this.updateStatusBar('<b>Gestionar > Vehículo</b>');
    },
    // Menu Nomenclador, button chofer-vehiculo.
    choferVehiculoMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.especialista.chofer_vehiculo.ChoferVehiculoGrid'));
        this.updateStatusBar('<b>Gestionar > Chofer-Vehículo</b>');
    },
    // Menu Nomenclador, button area de parqueo.
    areaParqueoMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.especialista.area_parqueo.AreaParqueoGrid'));
        this.updateStatusBar('<b>Gestionar > Área de parqueo</b>');
    },
    // Menu Nomenclador, button situacion operativa.
    situacionOperativaMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.especialista.situacion_operativa.SituacionOperativaGrid'));
        this.updateStatusBar('<b>Gestionar > Situación operativa</b>');
    },
    // Menu Nomenclador, button tipo de vehiculo.
    tipoVehiculoMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.especialista.vehiculo_tipo.VehiculoTipoGrid'));
        this.updateStatusBar('<b>Gestionar > Tipo de vehículo</b>');
    },
    // Menu Nomenclador, button modelo.
    modeloMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.especialista.modelo.ModeloGrid'));
        this.updateStatusBar('<b>Gestionar > Modelo</b>');
    },
    // Menu Nomenclador, button marca.
    marcaMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.especialista.marca.MarcaGrid'));
        this.updateStatusBar('<b>Gestionar > Marca</b>');
    },
    // Menu Nomenclador, button agente.
    agenteMenuClick: function ()
    {
        this.addComponent(Ext.create('CDT.view.transporte.especialista.agente.AgenteGrid'));
        this.updateStatusBar('<b>Gestionar > Agente</b>');
    },
//    // Menu Nomenclador, button chofer.
//    planificacionMenuClick: function ()
//    {
//        this.addComponent(Ext.create('CDT.view.transporte.especialista.planificacion.PlanificacionGrid'));
//        this.updateStatusBar('<b>Gestionar > Planificación</b>');
//    },
    // Add componente en el panel.
    addComponent: function (cmp)
    {
        var center_panel = Ext.getCmp('center-panel-id');
        
        center_panel.removeAll();
        center_panel.add(cmp);
    },
    // Eliminar componente del center panel.
    removeComponent: function (cmp)
    {
        var center_panel = Ext.getCmp('center-panel-id');
        
        center_panel.removeAll();
        
        this.updateStatusBar('>');
    },
    // Update detalle de barra de estado.
    updateStatusBar: function (texto)
    {
        var status_bar = Ext.getCmp('status-bar-detalles');
        
        status_bar.update('<b><span style="color:#000;">'+texto+'</span></b>');
    }
});


