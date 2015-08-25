                <script>
                    moment.locale('ro');
                    var picker = new Pikaday(
                        {
                            field: document.getElementById('datepicker'),
                            position: 'top right',
                            reposition: false,
                            firstDay: 1,
                            minDate: new Date(),
                            format: 'DD.M.YYYY'
                        });
                </script>

                </section>
            </section>
        </section>
    </section>
</body>
</html>