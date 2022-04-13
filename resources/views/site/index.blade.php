<table>
    @for ($i = 0; isset($dados[$i]); $i++)
    <tr>
        <td>
            {{ $dados[$i]->login}}
        </td>
    </tr>
    @endfor
</table>
{{ $dados->links() }}
