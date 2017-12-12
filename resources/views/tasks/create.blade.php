@extends('layouts.app')

@section('content')

<h1>新規タスク作成ページ</h1>

<div class="row">
  <div class="
    col-sm-offset-2 col-sm-8 
    col-md-offset-2 col-md-8 
    col-lg-offset-3 col-lg-5">  
      {!! Form::model($task, ['route' => 'tasks.store']) !!}
        <div class="form-group">
          {!! Form::label('status','実行状況:') !!}
          {!! Form::select('status',[
          'no ready'=>'no ready',
          'ready'=>'ready',
          'doing'=>'doing',
          'done'=>'done'
          ],null,['class'=>'form-control']) !!}
        </div>
        
        <div class="form-group">
          {!! Form::label('content','タスク:') !!}
          {!! Form::text('content',null,['class'=>'form-control']) !!}
        </div>
  </div>    
</div>      
    
    {!! Form::submit('追加',['class'=>'btn btn-primary']) !!}
  {!! Form::close() !!}


@endsection