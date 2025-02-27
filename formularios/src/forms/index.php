<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../output.css" rel="stylesheet">
</head>

<body class="flex justify-center pt-5">
    <div class="flex flex-col items-center justify-center w-full max-w-[1000px]">
        <div class="w-full mb-10">
            <h1 class="font-bold ">Formulário 1</h1>
        </div>

        <form method="post" id="form1" action="form1.php" class="p-3 w-full flex border border-2 border-gray-200 gap-4 flex-wrap justify-between">
            <div class="w-full sm:w-[30%]">
                <label for="first-name" class="block text-sm/6 font-medium text-gray-900">First Name</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="text" id="first-name" name="firstName"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[30%]">
                <label for="last-name" class="block text-sm/6 font-medium text-gray-900">Last Name</label>
                <div>
                    <div class="flex items-center rounded-md bg-white pl-3 h-10 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="text" id="last-name" name="lastName"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[30%]">
                <label for="username" class="block text-sm/6 font-medium text-gray-900">Username</label>
                <div class="w-full">
                    <div class=" overflow-hidden flex flex-row items-center h-10 rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <div class="w-[15%] h-full bg-gray-300 flex font-bold text-lg justify-center items-center">@
                        </div>
                        <input type="text" id="username" name="username"
                            class="w-[80%] block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[40%]">
                <label for="city" class="block text-sm/6 font-medium text-gray-900">City</label>
                <div>
                    <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="text" id="city" name="city"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[25%]">
                <label for="state" class="block text-sm/6 font-medium text-gray-900">State</label>
                <div>
                    <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="text" id="state" name="state"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[25%]">
                <label for="zip" class="block text-sm/6 font-medium text-gray-900">Zip</label>
                <div>
                    <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="text" id="zip" name="zip"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="">
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-start">
                <input type="checkbox" id="terms" name="terms" />
                <label for="terms" class="ml-2" name="terms">Agree to terms and conditions</label>
            </div>
            <input class="bg-blue-500 h-10 px-5 rounded-sm text-white  cursor-pointer" type="submit" form="form1" value="Submit form" />
        </form>

        <div class="w-full my-10">
            <h1 class="font-bold">Formulário 2</h1>
        </div>

        <form class="p-3 w-full flex border border-2 border-gray-200 flex-wrap gap-2 justify-between">
            <div class="w-full sm:w-[7%]">
                <label for="codigo" class="block text-sm/6 font-medium text-gray-900">Código</label>
                <div>
                    <div class="flex items-center rounded-md bg-gray-200 h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="number" id="codigo"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="">
                    </div>
                </div>
            </div>

            <div class="w-full sm:w-[33%]">
                <label for="nome" class="block text-sm/6 font-medium text-gray-900">Nome</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="text" id="nome"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="Nome Completo do Cliente">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[33%]">
                <label for="email" class="block text-sm/6 font-medium text-gray-900">E-mail</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="email" id="email"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="client@dominio.com">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[20%]">
                <label for="cpf" class="block text-sm/6 font-medium text-gray-900">CPF</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="number" id="cpf"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="Só numeros">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[20%]">
                <label for="celular" class="block text-sm/6 font-medium text-gray-900">Nº Celular</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="number" id="celular"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="Nº do Celular">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[20%]">
                <label for="first-name" class="block text-sm/6 font-medium text-gray-900">Nº Telefone Fixo</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="number" id="tel-fixo"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="Nº Telefone">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[20%]">
                <label for="cep" class="block text-sm/6 font-medium text-gray-900">CEP</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="number" id="cep"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="ex: 88308070">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[20%]">
                <label for="logradouro" class="block text-sm/6 font-medium text-gray-900">Logradouro</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="text" id="logradouro"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="ex: Rua 1400">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[10%]">
                <label for="numero" class="block text-sm/6 font-medium text-gray-900">Numero</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="number" id="numero"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="Nº">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[20%]">
                <label for="bairro" class="block text-sm/6 font-medium text-gray-900">Bairro</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="number" id="Bairro"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="Bairro">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[20%]">
                <label for="cidade" class="block text-sm/6 font-medium text-gray-900">Cidade</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="text" id="cidade"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="Cidade">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[10%]">
                <label for="uf" class="block text-sm/6 font-medium text-gray-900">Bairro</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <input type="text" id="uf"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="UF">
                    </div>
                </div>
            </div>
            <div class="w-full sm:w-[20%]">
                <label for="uf" class="block text-sm/6 font-medium text-gray-900">Bairro</label>
                <div>
                    <div class="flex items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                        <select name="status" id="status" class="w-full">
                            <option value="Selecione">Selecione</option>
                            <option value="Ativado">Ativado</option>
                            <option value="Desativado">Desativado</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="w-full justify-end flex mt-5 gap-2">
                <input class="bg-red-500 h-10 px-5  text-white cursor-pointer" type="button" value="Resetar" />
                <input class="bg-green-500 h-10 px-5  text-white  cursor-pointer" type="button" value="Próximo" />
            </div>
        </form>

        <div class="w-full my-10">
            <h1 class="font-bold">Formulário 3</h1>
        </div>

        <form class="p-3 w-full flex border border-2 border-gray-200 flex-wrap gap-5 justify-center">
            <h4 class="text-[30px] w-full text-center">Sample Form</h4>
            <div class="w-full sm:w-[40%] flex flex-row items-center gap-4">
                <label for="uf" class="w-[30%] block text-sm/6 font-medium text-gray-900">Partner Name</label>
                <div class="flex w-[70%] items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input type="text"
                        id="partnerName"
                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                        placeholder="">
                </div>
            </div>
            <div class="w-full sm:w-[40%] flex flex-row items-center gap-4">
                <label for="uf" class="w-[30%] block text-sm/6 font-medium text-gray-900">Partner Email Id</label>
                <div class="flex w-[70%] items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input type="text"
                        id="partnerEmailId"
                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                        placeholder="">
                </div>
            </div>
            <div class="w-full sm:w-[40%] flex flex-row items-center gap-4">
                <label for="uf" class="w-[30%] block text-sm/6 font-medium text-gray-900">Partner Legal Name</label>
                <div class="flex w-[70%] items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input type="text"
                        id="partnerLegalName"
                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                        placeholder="">
                </div>
            </div>
            <div class="w-full sm:w-[40%] flex flex-row items-center gap-4">
                <label for="uf" class="w-[30%] block text-sm/6 font-medium text-gray-900">Partner Mobile</label>
                <div class="flex w-[70%] items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input type="text"
                        id="partnerMobile"
                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                        placeholder="">
                </div>
            </div>
            <div class="w-full px-20 flex flex-row items-center gap-4">
                <label for="uf" class="w-[30%] block text-sm/6 font-medium text-gray-900">Partner Address</label>
                <div class="flex w-full h-[80px] items-center rounded-md bg-white h-10 pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                    <input type="text"
                        id="partnerMobile"
                        class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                        placeholder="">
                </div>
            </div>
        </form>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>

</html>