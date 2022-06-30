@extends('layout')

@section('content')

<h1>Список завдань:  "{{ $p_name->project_name }}" </h1>

<table class="table table-striped">
    <thead>
      <tr>
        <th>Заголовок</th>
        <th>Назва проекту</th>
        <th>Пріоритет</th>
        <th>Статус</th>
        <th>Дії</th>
      </tr>
    </thead>

@if ( !$task_list->isEmpty() ) 
    <tbody>
    @foreach ( $task_list as $task)
      <tr>
        <td>{{ $task->task_title }} </td>
        <td>{{ $task->project->project_name }}</td>
        <td>
            @if ( $task->priority == 0 )
                <span class="label label-info">Звичайна</span>
            @else
                <span class="label label-danger">Висока</span>
            @endif
        </td>
        <td>
            @if ( !$task->completed )
                <a href="{{ route('task.completed', ['id' => $task->id]) }}" class="btn btn-warning"> Завершити</a>
            @else
                <span class="label label-success">Завершений</span>
            @endif
        </td>
        <td>
            <!-- <a href="{{ route('task.edit', ['id' => $task->id]) }}" class="btn btn-primary"> edit </a> -->
            <a href="{{ route('task.view', ['id' => $task->id]) }}" class="btn btn-primary"> <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> </a>
            <a href="{{ route('task.delete', ['id' => $task->id]) }}" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>

        </td>
      </tr>

    @endforeach
    </tbody>
@else 
    <p><em></em></p>
@endif


</table>



<div class="btn-group">
    <a class="btn btn-default" href="{{ redirect()->getUrlGenerator()->previous() }}">Назад</a>
</div>




@stop