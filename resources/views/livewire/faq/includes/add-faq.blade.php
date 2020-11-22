<div class="dynamic-wrap">
    <form role="form" autocomplete="off">
        @csrf
        @foreach($inputs as $input)
            <label>FAQ #{{ $loop->iteration }}</label>
            <div class="entry input-group" {{--wire:key="{{ $input }}"--}}>
                <input wire:model="input.{{ $loop->index }}.question"
                       class="form-control {{ $errors->has('question.'.$input) ? 'is-invalid' : '' }}"
                       style="outline: 1px solid rgb(29 202 0 / 0.5); border: none;"
                       type="text" placeholder="Type something"
                />

                @if($input > 0)
                <span class="input-group-btn">
                    <button wire:click.prevent="decrementInput({{ $input }})" class="btn btn-danger btn-remove" style="margin-left: 5px;" type="button">
                    <span class="fa fa-minus"></span>
                    </button>
                </span>
                @endif
                @if($errors->has('question.'.$input))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('question.'.$input) }}</strong>
                </span>
                @endif
            </div>

            <div class="mt-2">
            <textarea wire:model="input.{{ $loop->index }}.answer"
                      class="col-md-12 {{ $errors->has('answer.'.$input) ? 'is-invalid' : '' }}"
                      rows="5"
                      style="resize:none; outline: 1px solid rgb(29 202 0 / 0.5); border: none;"
            ></textarea>
                @if($errors->has('answer.'.$input))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('answer.'.$input) }}</strong>
                </span>
                @endif
            </div>
        @endforeach
        <button wire:click.prevent="incrementInput()" class="btn btn-success btn-add" style="float: right" type="button">
            <span class="fa fa-plus"></span>
            Add new field
        </button>

        <div class="row">
            <div class="col-md-12">
                <button wire:click.prevent="store" type="button" class="btn btn-primary btn-add" style="float: right">
                    Submit
                </button>
            </div>
        </div>

    </form>

    <br>
    <small>
        Press [ <span class="fa fa-plus"></span> ] to add another form field ... :D
    </small>
</div>
