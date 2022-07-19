<?php


namespace Model;

use Helper\DBHelper;
use Core\AbstractModel;

class User extends AbstractModel
{
    private string $name;

    private string $lastName;

    private string $email;

    private int $phone;

    private int $activityId;

    private Activity $activity;

    private string $gender;

    private int $age;

    protected const TABLE = 'users';

    public function __construct(?int $id = null)
    {
        if ($id !== null){
            $this->load($id);
        }
    }

    public function assignData(): void
    {
        $this->data = [
            'name' => $this->name,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'phone' => $this->phone,
            'activity_id' => $this->activityId,
            'gender' => $this->gender,
            'age' => $this->age

        ];
    }

    /**
     * @return int
     */
    public function getActivityId(): int
    {
        return $this->activityId;
    }

    /**
     * @param int $activityId
     */
    public function setActivityId(int $activityId): void
    {
        $this->activityId = $activityId;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     */
    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }


    public function getActivity(): Activity
    {
        return $this->activity;
    }


    public function load(int $id): User
    {
        $db = new DBHelper();
        $data = $db->select()->from(self::TABLE)->where('id', (string)$id)->getOne();
        $this->id = (int)$data['id'];
        $this->name = $data['name'];
        $this->lastName = $data['last_name'];
        $this->phone = (int)$data['phone'];
        $this->email = $data['email'];
        $this->activityId = (int)$data['activity_id'];
        $activity = new Activity();
        $this->activity = $activity->load($this->activityId);
        $this->gender = (string)$data['gender'];
        $this->age = (int)$data['age'];
        return $this;
    }
}