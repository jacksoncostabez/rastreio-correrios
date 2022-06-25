<html>

    @if (isset($results['objetos']))
        @foreach ($results['objetos'] as $objeto)
            <h2 class="mt-3">{{ $objeto['codObjeto'] }}</h2>
            
            @if (!isset($objeto['eventos']))
                @php
                    $mensagem = $objeto['mensagem'] ?? 'Não foi possível buscar dados da API dos correios';
                @endphp

                <div class="alert alert-warning">
                    {{ $mensagem }}
                </div>

                {{-- pula para o próximo índice --}}
                @continue
            @endif

            {{-- imprime os dados do objeto - Os itens rastreados --}}
            @foreach ($objeto['eventos'] as $evento)
                @php
                    $imagem = isset($evento['urlIcone']) ? $evento['urlIcone'] : null;
                @endphp

                @php
                    $cidade = isset($evento['unidade']['endereco']['cidade']) ? $evento['unidade']['endereco']['cidade'] . '/' . $evento['unidade']['endereco']['uf'] : null;

                    $dados = [
                        $evento['descricao'],
                        $cidade,
                        isset($evento['unidade']['nome']) ? $evento['unidade']['nome'] : null,
                    ];
                @endphp

                <div class="alert alert-light d-flex align-items-center">

                    @if (!is_null($imagem))
                        <div style="width: 150px;">
                            <img src="{{ $url_base.''.$imagem }}" alt="">
                        </div>
                    @endif

                    <div style="flex: 1;">{{ implode(' - ', array_filter($dados)) }}</div>

                    <div style="width: 200px">
                        <span class="badge bg-dark">{{ date('d/m/Y H:i:s', strtotime($evento['dtHrCriado'])) }}</span>
                    </div>
                </div>
            @endforeach
        @endforeach

    @else
        <div class="alert alert-warning">
            Você precisa informar um código de rastreio
        </div>
    @endif

</html>