@extends('admin.image-carousel.form',[
    'title'=>_t('global.edit'),
    'route'=>route("admin.image-carousel.update", [$model->id]),'button'=>_t('Save'),
    'method'=>'PUT'
    ])
