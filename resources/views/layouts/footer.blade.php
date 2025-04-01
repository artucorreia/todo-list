<footer class="px-40 py-12 bg-black text-white max-md:px-8">
    <section class="flex justify-between max-md:flex-col max-md:gap-5">
        <div class="w-3/5 max-md:w-full">
            <h2 class="font-bold uppercase text-lg">arthur correia</h2>
            <div class="text-sm">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae suscipit libero delectus pariatur id
                sunt itaque architecto ea sit aliquam, commodi voluptas ad qui dolorum dolore, harum obcaecati iste.
                Dolores.
            </div>
        </div>
        <div>
            <h2 class="font-bold uppercase text-lg">social</h2>
            <div class="flex justify-between items-center max-md:w-30">
                <x-carbon-logo-x class="size-8 hover:cursor-pointer" />
                <x-carbon-logo-linkedin class="size-8 hover:cursor-pointer" />
                <x-carbon-logo-github class="size-8 hover:cursor-pointer" />
            </div>
        </div>
    </section>
    <div class="bg-white w-full h-0.5 my-5 opacity-15"></div>
    <section class="text-center">
        <span class="text-sm">
            &copy; Copyright {{ date('Y') }}. Made by <a href="https://github.com/artucorreia" target="_blank"
                class="underline capitalize">arthur correia</a>
        </span>
    </section>
</footer>
