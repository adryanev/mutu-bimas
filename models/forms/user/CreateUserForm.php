<?php


namespace app\models\forms\user;


use app\models\ProfilUser;
use app\models\User;
use InvalidArgumentException;
use Yii;
use yii\base\Model;
use yii\bootstrap\ActiveForm;
use yii\db\Exception;

class CreateUserForm extends Model
{

    public $username;
    public $password;
    public $email;
    public $status;
    public $hak_akses;

    public $nama_lengkap;
    public $tipe;
    /**
     * @var User
     */
    private $_user;

    /**
     * @var ProfilUser
     */
    private $_profilUser;

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
        ];
    }

    public function rules()
    {
        return [

            [['username', 'password', 'email', 'status', 'hak_akses', 'nama_lengkap',], 'required'],
            [['username'],'unique','targetClass' => User::class, 'message' => '{attribute} "{value}" telah digunakan.'],
            [['email'],'unique','targetClass' => User::class,'message' => '{attribute} "{value}" telah digunakan.'],
            [['username', 'password', 'email', 'hak_akses', 'nama_lengkap'], 'string'],
        ];
    }

    public function addUser()
    {
        $user = new User();
        $user->scenario = 'create';
        $profil = new ProfilUser();
        $user->setAttributes(['username' => $this->username,
            'email' => $this->email,
            'status' => $this->status,
        ]);
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        $profil->setAttributes(['nama_lengkap' => $this->nama_lengkap,], false);

        $transaction = Yii::$app->db->beginTransaction();


        if (!$user->save(false)) {
            $transaction->rollBack();
            return null;
        }
        $profil->id_user = $user->id;
        if (!$profil->save(false)) {
            $transaction->rollBack();
            return null;
        }

        try {

            $auth = Yii::$app->getAuthManager();
            $role = $auth->getRole($this->hak_akses);

            try {
                $auth->assign($role, $user->id);
            } catch (\Exception $e) {
                $transaction->rollBack();
                return null;
            }

            $transaction->commit();
            return $user;

        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
        return null;
    }

}
