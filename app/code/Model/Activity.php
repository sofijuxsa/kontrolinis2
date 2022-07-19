<?php

namespace Model;

use Helper\DBHelper;

class Activity
{
    private int $id;

    private string $name;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function load(int $id): Activity
    {
        $db = new DBHelper();
        $activity = $db->select()->from('activities')->where('id', (string)$id)->getOne();
        $this->id = (int)$activity['id'];
        $this->name = $activity['name'];
        return $this;
    }

    public static function getActivities(): array
    {
        $db = new DBHelper();

        $data = $db->select()->from('activities')->get();
        $activities = [];
        foreach ($data as $element){
            $activity = new Activity();
            $activity->load((int)$element['id']);
            $activities[] = $activity;
        }
        return $activities;
    }

}