<tr>
    <td class="align-middle">{{ $promocode->name }}</td>
    <td class="align-middle">{{ $promocode->email }}</td>
    <td class="align-middle">{{ $promocode->phone_number }}</td>
    <td class="align-middle">{{ $promocode->code }}</td>
    <td class="align-middle">{{ $promocode->amount }}</td>

    <td class="align-middle">
        <span class="badge badge-lg badge-success">
            {{ trans("app.status.{$promocode->status}") }}
        </span>
    </td>
    <td class="align-middle">{{ $promocode->created_at }}</td>
    <td class="text-center align-middle">

        <a href=""
           class="btn btn-icon"
           title="@lang('Delete Promocode')"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="@lang('Please Confirm')"
           data-confirm-text="@lang('Are you sure that you want to delete this promocode?')"
           data-confirm-delete="@lang('Yes, delete!')">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>