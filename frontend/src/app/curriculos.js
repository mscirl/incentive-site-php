export default async function handler(req, res) {
  const flaskUrl = "http://127.0.0.1:5001/api/curriculos";

  try {
    const response = await fetch(flaskUrl, {
      method: req.method,
      headers: {
        "Content-Type": "application/json",
      },
      body: req.method !== "GET" ? JSON.stringify(req.body) : undefined,
    });

    const data = await response.json();
    res.status(response.status).json(data);
  } catch (error) {
    console.error("Erro ao conectar com Flask:", error);
    res.status(500).json({ error: "Erro no proxy para Flask" });
  }
}