@props(['disabled' => false, 'type' => 'input', 'value' => ''])

@if ($type == 'textarea')
<textarea @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>{{$value}}</textarea>
@else
<input @disabled($disabled) type="{{ $type }}" value="{{ $value }}" {{ $attributes->merge(['class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm']) }}>
@endif
