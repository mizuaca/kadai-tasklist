@extends('layouts.app')

@section('content')

<h1>新規タスク作成ページ</h1>

  {!! Form::model($task, ['route' => 'tasks.store']) !!}
  
    {!! Form::label('status','実行状況:') !!}
    {!! Form::select('status',[
    'no ready'=>'no ready',
    'ready'=>'ready',
    'doing'=>'doing',
    'done'=>'done'
    ]) !!}
    
    {!! Form::label('content','タスク:') !!}
    {!! Form::text('content') !!}
    
    {!! Form::submit('追加') !!}
  {!! Form::close() !!}


@endsection