<div class="dynamic-wrap">
    <form role="form" autocomplete="off">
        @csrf
        @foreach($inputs as $key => $input)
            <label>FAQ #{{ $loop->iteration }}</label>
            <div class="entry input-group" wire:key="{{ $key }}">
                <input wire:model="inputs.{{ $key }}.question"
                       class="form-control {{ $errors->has('inputs.'.$key.'.question') ? 'is-invalid' : '' }}"
                       style="outline: 1px solid rgb(29 202 0 / 0.5); border: none;"
                       type="text" placeholder="What's your question ... ?"
                />

                @if($key > 0)
                    <span class="input-group-btn">
                    <button wire:click.prevent="decrementInput({{ $key }})" class="btn btn-danger btn-remove" style="margin-left: 5px;" type="button">
                    <span class="fa fa-minus"></span>
                    </button>
                </span>
                @endif

                @if($errors->has('inputs.'.$key.'.question'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('inputs.'.$key.'.question') }}</strong>
                </span>
                @endif

            </div>

            <div class="mt-2">
            <textarea wire:model="inputs.{{ $key }}.answer"
                      class="col-md-12 {{ $errors->has('inputs.'.$key.'.answer') ? 'is-invalid' : '' }}"
                      rows="5"
                      style="resize:none; outline: 1px solid rgb(29 202 0 / 0.5); border: none;"
                      placeholder="Type your answer"
            ></textarea>
                @if($errors->has('inputs.'.$key.'.answer'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('inputs.'.$key.'.answer') }}</strong>
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
