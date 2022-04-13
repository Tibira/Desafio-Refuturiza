Index
{{-- {{ $dados['login'] }} --}}
<table>
    <tr>
        @foreach ($dados as $dado)

        <th>{{ $dado['login'] }}</th>

        @endforeach
    </tr>
</table>
