async function kirimKeAI() {
    const pertanyaan = document.getElementById("pertanyaanAI").value;
    const output = document.getElementById("jawabanAI");

    if (!pertanyaan.trim()) {
        alert("Silakan tulis pertanyaan terlebih dahulu.");
        return;
    }

    output.innerHTML = "⏳ Sedang memproses jawaban...";

    try {
        const response = await fetch("/ai-ask", {
            // Route Laravel
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify({ pertanyaan }),
        });

        const data = await response.json();
        output.innerHTML = data.jawaban || "Tidak ada jawaban.";
    } catch (error) {
        console.error(error);
        output.innerHTML = "⚠ Terjadi kesalahan. Coba lagi.";
    }
}
