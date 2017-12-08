@extends('layouts.app')

@section('content')

<h1>タスク編集ページ</h1>

  {!! Form::model($task, ['route' => ['tasks.update',$task->id],'method' => 'put']) !!}
  
    {!! Form::label('status','実行状況:') !!}
    {!! Form::select('status',[
    'no ready'=>'no ready',
    'ready'=>'ready',
    'doing'=>'doing',
    'done'=>'done'
    ]) !!}
    
    {!! Form::label('content','タスク:') !!}
    {!! Form::text('content') !!}
    
    {!! Form::submit('更新') !!}
  {!! Form::close() !!}

@endsection