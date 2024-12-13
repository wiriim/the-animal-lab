@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <p class="navbar-brand ms-3">TheAnimalLab</p>
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
