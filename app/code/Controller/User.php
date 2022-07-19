<?php

namespace Controller;

use Helper\FormHelper;
use Helper\Url;
use Model\User as UserModel;
use Model\Activity;
use Core\AbstractController;
use Core\Interfaces\ControllerInterface;


class User extends AbstractController implements ControllerInterface
{
    public function index(): void
    {
    }

    public function show(int $id): void
    {
        echo 'User controller ID: ' . $id;
    }

    public function register(): void
    {
        $form = new FormHelper('user/create', 'POST');

        $form->input([
            'name' => 'name',
            'type' => 'text',
            'placeholder' => 'Vardas'
        ]);
        $form->input([
            'name' => 'last_name',
            'type' => 'text',
            'placeholder' => 'Pavardė'
        ]);
        $form->input([
            'name' => 'phone',
            'type' => 'text',
            'placeholder' => '+3706******'
        ]);
        $form->input([
            'name' => 'email',
            'type' => 'email',
            'placeholder' => 'Elektroninis paštas'
        ]);
        $options = ['Vyras', 'Moteris'];
        $form->select(['name' => 'gender', 'options' => $options]);

        $options = [];
        for ($i = 1; $i<= 100; $i++){
            $id = $i;
            $options[$id] = $i;
        }

        $form->select(['name' => 'age', 'options' => $options]);

        $activities = Activity::getActivities();
        $options = [];
        foreach ($activities as $activity) {
            $id = $activity->getId();
            $options[$id] = $activity->getName();
        }

        $form->select(['name' => 'activity_id', 'options' => $options]);
        $form->input([
            'name' => 'create',
            'type' => 'submit',
            'value' => 'register'
        ]);

        $this->data['form'] = $form->getForm();

        $this->render('user/register');
    }

    public function create(): void
    {
            $user = new UserModel();
            $user->setName($_POST['name']);
            $user->setLastName($_POST['last_name']);
            $user->setEmail($_POST['email']);
            $user->setPhone((string)($_POST['phone']));
            $user->setActivityId((int)($_POST['activity_id']));
            $user->setAge((int)($_POST['age']));
            $user->setGender($_POST['gender']);
            print_r($user);
            $user->save();
            Url::redirect('home');
    }
}