<?php


namespace app\commands;


use Yii;
use yii\console\Controller;
use yii\console\ExitCode;

class AuthController extends Controller
{

    public function actionUp()
    {
        $auth = Yii::$app->authManager;

        printf("Creating Roles\n");
        $superadmin = $auth->createRole('superadmin');
        $bimas = $auth->createRole('bimas');


        $auth->add($superadmin);
        $auth->add($bimas);

        printf("Assigning SuperAdmin\n");
        $auth->assign($superadmin, 1);

        $su = $auth->getRole('superadmin');

        $suPermission = ['/*'];

        foreach ($suPermission as $permission) {
            printf("Creating Permission: " . $permission . "\n");
            $permission = $auth->createPermission($permission);
            $auth->add($permission);
            printf("Assigning Permission to Roles \n");
            $auth->addChild($su, $permission);

        }

        $bimasPermission = ['/site/index'];

        foreach ($bimasPermission as $permission) {
            printf("Creating Permission: " . $permission . "\n");
            $permission = $auth->createPermission($permission);
            $auth->add($permission);
            printf("Assigning Permission to Roles \n");
            $auth->addChild($bimas, $permission);

        }
        return ExitCode::OK;
    }

    public function actionDown()
    {
        $auth = Yii::$app->getAuthManager();
        printf("Removing all rbac authorization\n");
        $auth->removeAll();

        return ExitCode::OK;
    }
}