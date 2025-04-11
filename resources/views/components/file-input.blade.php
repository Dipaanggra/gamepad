@props(['disabled' => false, 'name' => 'image', 'value' => null])

<div x-data="{ preview: {{$value}} }" class="flex flex-col gap-2">
    <template x-if="preview">
        <img :src="preview" class="rounded-md shadow max-w-sm aspect-video object-contain border border-gray-200" />
    </template>
    <input @disabled($disabled) type="file" name="{{ $name }}"
        {{ $attributes->merge(['class' => 'border-gray-300 file:border-0 file:py-2.5 file:px-4 file:mr-2 focus:border-indigo-500 border focus:ring-indigo-500 rounded-md shadow-sm ']) }}
        @change="
            const file = $event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = e => preview = e.target.result;
                reader.readAsDataURL(file);
            }
        ">

</div>
