<div class="modal fade" id="requestDesignModal" tabindex="-1" role="dialog" aria-labelledby="requestDesignLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('request.design') }}" method="POST" name="form_request_design" id="form_request_design">
                {{ csrf_field() }}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="requestDesignLabel">Заказать дизайн/замер</h4>
                </div>
                <div class="modal-body">
                    <div class="form-status"></div>
                    <div class="form-group">
                        <p class="form-control-static" id="request-design-product"></p>
                        <input type="hidden" name="product">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Ваше имя">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="phone" placeholder="Телефон">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" name="message" placeholder="Сообщение"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <button type="submit" class="btn btn-primary form-button">Оформить заказ</button>
                </div>
            </form>
        </div>
    </div>
</div>