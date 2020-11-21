<div class="dynamic-wrap">
    <form role="form" autocomplete="off">
        @csrf
            <input type="hidden" wire:model="faqId">
            <label >FAQ # {{ $faqId }}</label>
            <div class="entry input-group">
                <input wire:model="editQuestion"
                       class="form-control {{ $errors->has('question') ? 'is-invalid' : '' }}"
                       style="outline: 1px solid rgb(29 202 0 / 0.5); border: none;"
                       type="text" placeholder="Type something"
                />

                @if($errors->has('question'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('question') }}</strong>
                </span>
                @endif
            </div>

            <div class="mt-2">
            <textarea wire:model="editAnswer"
                      class="col-md-12 {{ $errors->has('answer') ? 'is-invalid' : '' }}"
                      rows="5"
                      style="resize:none; outline: 1px solid rgb(29 202 0 / 0.5); border: none;"
            ></textarea>
                @if($errors->has('answer'))
                    <span class="invalid-feedback">
                    <strong>{{ $errors->first('answer') }}</strong>
                </span>
                @endif
            </div>

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
