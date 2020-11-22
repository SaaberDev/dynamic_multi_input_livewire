<div class="dynamic-wrap">
    <form role="form" autocomplete="off">
        @csrf
        @foreach($inputs as $key => $input)
            <label>FAQ #{{ $faqId }}</label>
            <div class="entry input-group" wire:key="{{ $key }}">
                <input wire:model="inputs.{{ $key }}.question"
                       class="form-control {{ $errors->has('inputs.'.$key.'.question') ? 'is-invalid' : '' }}"
                       style="outline: 1px solid rgb(29 202 0 / 0.5); border: none;"
                       type="text" placeholder="Type something"
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
            ></textarea>
                @if($errors->has('inputs.'.$key.'.answer'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('inputs.'.$key.'.answer') }}</strong>
                </span>
                @endif
            </div>
        @endforeach

        <div class="row">
            <div class="col-md-12">
                <button wire:click.prevent="update" type="button" class="btn btn-primary btn-add" style="float: right">
                    Update
                </button>

                <div class="row">
                    <div class="col-md-12">
                        <button wire:click.prevent="cancel" type="button" class="btn btn-light btn-add" style="float: right">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </form>

    <br>
    <small>
        Press [ <span class="fa fa-plus"></span> ] to add another form field ... :D
    </small>
</div>
