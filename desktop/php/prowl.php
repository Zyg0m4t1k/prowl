<?php
if (!isConnect('admin')) {
    throw new Exception('{{401 - Accès non autorisé}}');
}
sendVarToJS('eqType', 'prowl');
?>

<div class="row row-overflow">
    <div class="col-md-2">
        <div class="bs-sidebar">
            <ul id="ul_eqLogic" class="nav nav-list bs-sidenav">
                <a class="btn btn-default eqLogicAction" style="width : 100%;margin-top : 5px;margin-bottom: 5px;" data-action="add"><i class="fa fa-plus-circle"></i> {{Ajouter compte Prowl}}</a>
                <li class="filter" style="margin-bottom: 5px;"><input class="filter form-control input-sm" placeholder="{{Rechercher}}" style="width: 100%"/></li>
                <?php
                foreach (eqLogic::byType('prowl') as $eqLogic) {
                    echo '<li class="cursor li_eqLogic" data-eqLogic_id="' . $eqLogic->getId() . '"><a>' . $eqLogic->getHumanName() . '</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="col-md-10 eqLogic" style="border-left: solid 1px #EEE; padding-left: 25px;display: none;">
        <form class="form-horizontal">
            <fieldset>
                <legend>{{Général}}</legend>
                <div class="form-group">
                    <label class="col-md-3 control-label">{{Nom du compte Prowl}}</label>
                    <div class="col-md-3">
                        <input type="text" class="eqLogicAttr form-control" data-l1key="id" style="display : none;" />
                        <input type="text" class="eqLogicAttr form-control" data-l1key="name" placeholder="{{Nom de l'équipement Prowl}}"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">{{Activer}}</label>
                    <div class="col-md-1">
                        <input type="checkbox" class="eqLogicAttr" data-l1key="isEnable" checked/>
                    </div>
                </div>
            </fieldset> 
        </form>

        <legend>{{Prowl}}</legend>
        <div class="alert alert-info">
            {{Pour un parfaite intégration de Prowl et Jeedom, dans votre scenario Prowl il faut mettre dans titre "$title$" et dans message "$message$".}}
        </div>


        <a class="btn btn-success btn-sm cmdAction" data-action="add"><i class="fa fa-plus-circle"></i> {{Ajouter une commande Prowl}}</a><br/><br/>
        <table id="table_cmd" class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>{{Nom}}</th><th>{{Username}}</th><th>{{Password}}</th><th></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <form class="form-horizontal">
            <fieldset>
                <div class="form-actions">
                    <a class="btn btn-danger eqLogicAction" data-action="remove"><i class="fa fa-minus-circle"></i> {{Supprimer}}</a>
                    <a class="btn btn-success eqLogicAction" data-action="save"><i class="fa fa-check-circle"></i> {{Sauvegarder}}</a>
                </div>
            </fieldset>
        </form>

    </div>
</div>

<?php include_file('desktop', 'prowl', 'js', 'prowl'); ?>
<?php include_file('core', 'plugin.template', 'js'); ?>